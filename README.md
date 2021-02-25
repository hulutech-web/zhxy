##
用户模型：user
id,name,email,CID,mobile,attendance_num,grade_id,clbum_id

##站点
支持多站点平台

##
建筑：教学楼，寝室楼，办公楼
##
部门：行政部，教研处，后勤部，政教处，校长办公室，

##
角色：role(角色)
校长，副校长，年级主任，班主任，普通老师，学生，学生家长
##
学生模型：student
id,stu_no,role_id,dormitory(宿舍)


##
课程：lesson
lesson->teacher

##
年级：grade
id,name,
##
班级：clbum（班级）
id,name
