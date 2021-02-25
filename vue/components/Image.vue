<template>
    <el-upload
            class="avatar-uploader"
            :action="action"
            :show-file-list="false"
            :on-success="handleAvatarSuccess"
            :before-upload="beforeAvatarUpload"
            :headers="headers"
    >
        <!--        定义value，因为input采用v-model，组件监听的就是直接采用value即可接收到父级组件的值-->
        <img v-if="value" :src="value" class="avatar">

        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
    </el-upload>
</template>

<script>
    export default {
        props: {
            //当加载页面时，image组件需要展示之前的数据，而这个数据是imageUrl的值
            value: {type: String},
            /**
             * 这个地方的访问路径，必须是根下面的所以需要开始的地方加上/，同时由于定义的是api路由，所以
             * 需要加上api
             */
            action: {type: String, default: "/api/upload/local"}
        },
        computed: {
            headers() {
                return {
                    'Authorization': `Bearer ${window.localStorage.getItem("token")}`
                }
            }
        },
        methods: {
            handleAvatarSuccess(res, file) {
                this.imageUrl = res.path;
                /**
                 * 上传成功后，需要把父级组件hd-image（用v-model绑定)的input中的地址，传递进去
                 */
                this.$emit("input", this.imageUrl);
            },
            beforeAvatarUpload(file) {
                const isJPG = file.type === 'image/jpeg';
                const isLt2M = file.size / 1024 / 1024 < 2;

                if (!isJPG) {
                    this.$message.error('上传头像图片只能是 JPG 格式!');
                }
                if (!isLt2M) {
                    this.$message.error('上传头像图片大小不能超过 2MB!');
                }
                return isJPG && isLt2M;
            }
        }
    }
</script>
<style>
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }

    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }

    .avatar {
        width: auto;
        height: 178px;
        display: block;
    }
</style>
