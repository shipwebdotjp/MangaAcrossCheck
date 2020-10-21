<template>
    <div class="flex mb-4 items-center">
        <p class="w-full text-grey-darkest">
             {{ bookmark.title }} ({{ bookmark.number }})
        </p>
        <inertia-link :href="route('bookmarks.edit', bookmark.id)" class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">
            ✏
        </inertia-link>
        <button v-on:click="bookmarkDelete" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red cursor-pointer">
            🗑
        </button>        
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
        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'DELETE'
                }, {
                    bag: 'bookmarkDelete'
                })
            }
        },
        methods: {
            bookmarkDelete: function(event){
                //alert("DEL:"+this.bookmark.id);
                this.$inertia.delete(route('bookmarks.destroy', this.bookmark.id), this.form, {
                    preserveScroll: true,
                    onSuccess: () => {
                        //
                    }
                })
                /*
                this.form.post(route('bookmarks.destroy', this.bookmark.id), {
                    preserveScroll: true,
                    onSuccess: () => {
                        //
                    }
                })
                */
            }
        }
    }
</script>
