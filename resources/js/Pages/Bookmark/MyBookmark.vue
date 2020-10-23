<template>
    <div class="flex mb-4 items-center">
        <p class="w-full text-grey-darkest">
             {{ bookmark.title }} ({{ bookmark.number }})
        </p>
        <inertia-link :href="route('bookmarks.edit', bookmark.id)" class="flex-no-shrink p-2 ml-4 mr-2 border-2 border-green-500 rounded hover:text-white text-green border-green hover:bg-green">
            <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
            <g>
                <path class="st0" d="M506.53,88.263L423.737,5.47c-7.294-7.293-19.118-7.293-26.411,0L47.776,341.176
                    c-2.168,2.168-3.769,4.836-4.661,7.768L0.836,487.86c-4.35,14.293,9.011,27.654,23.304,23.305l143.382-43.639h0L506.53,114.675
                    C513.823,107.381,513.823,95.556,506.53,88.263z M63.524,465.077l-16.584-16.584l24.373-80.107l47.004,25.29l25.296,47.012
                    L63.524,465.077z M453.986,75.041L156.172,374.747l-18.919-18.918l299.72-297.828l17.013,17.012
                    C453.986,75.024,453.986,75.03,453.986,75.041z" style="fill: rgb(75, 75, 75);"></path>
            </g>
            </svg>
        </inertia-link>
        <button v-on:click="bookmarkDelete" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red-500 hover:text-white hover:bg-red cursor-pointer">
            <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
            <g>
                <path class="st0" d="M439.114,69.747c0,0,2.977,2.1-43.339-11.966c-41.52-12.604-80.795-15.309-80.795-15.309l-2.722-19.297
                    C310.387,9.857,299.484,0,286.642,0h-30.651h-30.651c-12.825,0-23.729,9.857-25.616,23.175l-2.722,19.297
                    c0,0-39.258,2.705-80.778,15.309C69.891,71.848,72.868,69.747,72.868,69.747c-10.324,2.849-17.536,12.655-17.536,23.864v16.695
                    h200.66h200.677V93.611C456.669,82.402,449.456,72.596,439.114,69.747z" style="fill: rgb(75, 75, 75);"></path>
                <path class="st0" d="M88.593,464.731C90.957,491.486,113.367,512,140.234,512h231.524c26.857,0,49.276-20.514,51.64-47.269
                    l25.642-327.21H62.952L88.593,464.731z M342.016,209.904c0.51-8.402,7.731-14.807,16.134-14.296
                    c8.402,0.51,14.798,7.731,14.296,16.134l-14.492,239.493c-0.51,8.402-7.731,14.798-16.133,14.288
                    c-8.403-0.51-14.806-7.722-14.296-16.125L342.016,209.904z M240.751,210.823c0-8.42,6.821-15.241,15.24-15.241
                    c8.42,0,15.24,6.821,15.24,15.241v239.492c0,8.42-6.821,15.24-15.24,15.24c-8.42,0-15.24-6.821-15.24-15.24V210.823z
                    M153.833,195.608c8.403-0.51,15.624,5.894,16.134,14.296l14.509,239.492c0.51,8.403-5.894,15.615-14.296,16.125
                    c-8.403,0.51-15.624-5.886-16.134-14.288l-14.509-239.493C139.026,203.339,145.43,196.118,153.833,195.608z" style="fill: rgb(75, 75, 75);"></path>
            </g>
            </svg>
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
