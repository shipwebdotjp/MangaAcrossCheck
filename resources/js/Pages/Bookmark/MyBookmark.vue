<template>
    <div class="py-2">
        <div class="bookmark title">
             {{ bookmark.title }} ({{ bookmark.number }})
        </div>
        <inertia-link :href="route('bookmarks.edit', bookmark.id)">編集</inertia-link>
    </div>
</template>

<script>
    //import JetSectionTitle from './SectionTitle'

    export default {
        props:{
            bookmark: {
                type: Object,
            }
        },
        methods: {
            edit: function(event){
                alert("edit");
            }
        }
    }
</script>
