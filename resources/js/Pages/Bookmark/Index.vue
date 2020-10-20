<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ブックマーク
            </h2>
        </template>

        <div class="py-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-4">
                        <inertia-link :href="route('bookmarks.create')" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-4 px-4 border border-blue-500 hover:border-transparent rounded">
                            新しくブックマークを作る
                        </inertia-link>
                    </div>
                    
                    <div >
                        <ul>
                            <my-bookmark v-for="bookmark in bookmarks" v-bind:key="bookmark.id" v-bind:bookmark="bookmark" />
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>


<script>
    import AppLayout from '../../Layouts/AppLayout'
    import MyBookmark from './MyBookmark'

    export default {
        props:{
            bookmarks: {
                type: Array,
            }
        },
        components: {
            AppLayout,
            MyBookmark,
        },
    }
</script>
