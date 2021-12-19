<template>
    <div class="table-responsive mt-3">
        <table class="table table-sm table-hover card-new">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(student, index) of list" :key="index">
                    <th scope="row" v-text="index + 1"></th>
                    <td v-text="student.email" @click="getInfo(index)"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            students: {
                type: Array,
                default: []
            }
        },
        data() {
            return {
                list: []
            }
        },
        methods: {
            getInfo(index) {
                const item = this.list[index]
                this.setItem(item)
                
                setTimeout(() => {
                    this.$root.$children[2].showModal()
                }, 100)
            },
            setItem(item) {
                this.$root.$children[2].setItem(item)
            }
        },
        mounted() {
            this.list = this.students
        }
    }
</script>
