<template>
    <!-- Modal -->
    <div class="modal fade" id="modal-component" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content card-new">
                <div class="modal-header vino">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        {{ list.slice(0, -1) | capitalize }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div v-if="Object.keys(item).length">
                        <div class="global px-2 py-2">
                            <ul class="question list-group shadow-sm">
                                <li class="list-group-item">
                                    <p class="m-0 fw-bold small d-flex align-items-center">
                                        {{ title | capitalize }}
                                    </p> 
                                    <p class="m-0 small text-muted d-flex justify-content-start">
                                        {{ getName(item) }}
                                    </p>
                                </li>
                                <li v-if="countList > 0" class="list-group-item">
                                    <p class="m-0 mb-2 fw-bold small d-flex justify-content-center align-items-center">
                                        {{ subList | capitalize }}
                                    </p>
                                    <ul class="question list-group shadow-sm">
                                        <li
                                            v-for="(element, index) of item[subList]"
                                            :key="index"
                                            class="list-group-item"
                                        >
                                            <p class="m-0 fw-bold small d-flex align-items-center">
                                                {{ subTitle | capitalize }}
                                            </p> 
                                            <p class="m-0 small text-muted d-flex justify-content-start">
                                                {{ element[subTitle] }}
                                            </p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Close</button>
                    <button type="button" class="btn btn-primary"  @click="closeModal">OK</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'modal',
        data() {
            return {
                title: 'email',
                subTitle: 'name',
                list: 'students',
                subList: 'lessons',
                countList: 0,
                item: {}
            }
        },
        filters: {
            capitalize(word) {
                return word[0].toUpperCase() + word.slice(1);
            }
        },
        methods: {
            showModal() {
                $('#modal-component').modal('show')
            },
            closeModal() {
                $('#modal-component').modal('hide')
            },
            setItem(item) {
                this.item = JSON.parse(JSON.stringify(item))
            },
            getName(item) {
                let value = ''

                if (item.name !== undefined) {
                    value = item.name
                    this.title = 'name'
                    this.list = 'lessons'
                    this.subList = 'students'
                    this.subTitle = 'email'
                    this.countList = item.students.length
                } else {
                    value = item.email
                    this.title = 'email'
                    this.list = 'students'
                    this.subList = 'lessons'
                    this.subTitle = 'name'
                    this.countList = item.lessons.length
                }
                return value
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    .global {
        height: 400px;
        width: 100%;
        overflow-y: scroll;
    }
</style>