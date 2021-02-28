import axios from "axios";
import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        //表单验证错误
        errors: {},
        //登录用户
        user: {},
        // 学校
        school: {},
        // 所有用户
        users:{}

    },
    getters: {
        errors: state => name => state.errors[name] && state.errors[name][0],
        auth() {
            return Boolean(localStorage.getItem("token"));
        },
        token() {
            return window.localStorage.getItem("token");
        },
        school() {
            return state.school;
        },
        user(){
          return state.user;
        },
        users(){
          return state.users;
        }
    },
    //修改数据时使用，这是一个同步方法，不能在这里执行异步动作
    mutations: {
        //设置验证错误
        errors(state, errors = {}) {
            state.errors = errors;
        },
        user(state, user) {
            state.user = user;
        },
        users(state, users) {
            state.users = users;
        },
        school(state, school) {
            state.school = school;
        },

    },
    //用来执行异步动作
    actions: {
        async user({ commit }) {
            commit("user", await axios.get(`user/info`));
        },
         async school({ commit }) {
            commit("school", await axios.get(`school`));
        },
        async users({ commit }) {
            commit("users", await axios.get(`user`));
        }
    }
});
