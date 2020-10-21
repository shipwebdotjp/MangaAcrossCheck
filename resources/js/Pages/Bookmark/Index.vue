<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ブックマーク一覧
            </h2>
        </template>

        
            <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
                <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                    <div class="mb-4">
                        <inertia-link :href="route('bookmarks.create')" class="w-full flex bg-transparent item-center justify-center hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            新しくブックマークを作る
                        </inertia-link>
                    </div>
                    
                    <div >
                        <my-bookmark v-for="bookmark in bookmarks" v-bind:key="bookmark.id" v-bind:bookmark="bookmark" />
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
