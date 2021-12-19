<template>
    <div class="row justify-content-center">
        <div v-if="students.length" class="col-md-6 py-2">
            <div class="card card-new">
                <div class="card-header vino">Estudents</div>
                <select class="mt-2" name="select" :size="(students.length + 1)" v-model="seletedStudent">
                    <option :value="null">select a student</option>
                    <option
                        v-for="(studen, index) of students"
                        :key="index"
                        :value="studen.id"
                    >
                        {{ studen.email }}
                    </option>
                </select>
            </div>
        </div>
        <div v-if="seletedStudent" class="col-md-6 py-2">
            <div class="card card-new">
                <div class="card-header vino">Lessons</div>
                <select class="mt-2" name="select" :size="lessons.length" v-model="seletedLessons" multiple>
                    <option
                        v-for="(lesson, index) of lessons"
                        :key="index"
                        :value="lesson.id"
                    >
                        {{ lesson.name }}
                    </option>
                </select>
            </div>
        </div>

        <!-- Button -->
        <div v-if="seletedLessons && seletedStudent" class="text-end mt-2">
            <button type="button" class="btn btn-success" @click="setData">save</button>
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2'
    export default {
        data() {
            return {
                seletedStudent: null,
                seletedLessons: [],
                students: [],
                lessons: []
            }
        },
        methods: {
            async setData() {
                const url = `/admin/student/store`
                const params = {
                    studentId: this.seletedStudent,
                    lessonIds: this.seletedLessons
                }
                
                await axios.post(url, params)
                    .then((result) => {
                        const res = result.data

                        if (res.status) {
                            this.seletedStudent = null
                            this.seletedLessons = []

                            this.alert('success', res.message)
                        }
                    }).catch((err) => {
                        this.alert('error', 'An error occurred on the server')
                        console.log(err)
                    })
            },
            async getStudents() {
                const url = `/admin/list/students`
                
                await axios.get(url)
                    .then((result) => {
                        this.students = result.data
                    }).catch((err) => {
                        console.log(err)
                    })
            },
             async getLessons() {
                const url = `/admin/list/lessons`
                
                await axios.get(url)
                    .then((result) => {
                        this.lessons = result.data
                    }).catch((err) => {
                        console.log(err)
                    })
            },
            alert(type, message) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: `${type}`,
                    title: `${message}`
                })
            },
        },
        created() {
            this.getStudents()
            this.getLessons()
        }
    }
</script>