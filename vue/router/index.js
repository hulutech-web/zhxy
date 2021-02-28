import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes";
import store from "@/store";

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: "history"
});
//切换TOKEN和SESSION登录方式
const isLogin = Boolean(localStorage.getItem("token"));
// const isLogin = Boolean(window.user.id);

//路由拦截（守卫）
router.beforeEach(async (to, from, next) => {
    store.commit("errors");
    if (isLogin) {
        await Promise.all([
            store.dispatch("user"),
            // store.dispatch("school")
        ]);
    }
    if (to.matched.some(route => route.meta.auth) && !isLogin) {
        //需要验证但未登录
        next("/login");
    } else if (to.matched.some(route => route.meta.guest) && isLogin) {
        //该页面只能游客访问，但你已经登录了，就跳转到首页
        location.href = "/";
    } else {
        next();
    }
});

export default router;
