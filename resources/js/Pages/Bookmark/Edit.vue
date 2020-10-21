<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ブックマーク編集
            </h2>
        </template>
            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <jet-form-section @submitted="editBookmark">
                        <template #title>
                            ブックマーク編集
                        </template>

                        <template #description>
                            マンガのタイトルと，どこまで読んだのかを記録しましょう
                        </template>

                        <template #form>
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="title" value="マンガタイトル" />
                                <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" ref="title" autocomplete="title" />
                                <jet-input-error :message="form.error('title')" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="number" value="読んだ話数" />
                                <jet-input id="number" type="text" class="mt-1 block w-full" v-model="form.number" ref="number" autocomplete="number" />
                                <jet-input-error :message="form.error('title')" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="completed">
                                    <input id="completed" type="checkbox" class="mt-1" v-model="form.completed"  />
                                    最後まで読み終えた
                                </label>
                                <jet-input-error :message="form.error('completed')" class="mt-2" />
                            </div>
                        </template>

                        <template #actions>
                            <inertia-link :href="route('bookmarks.index')">ブックマーク一覧へ戻る</inertia-link>

                            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                                保存しました
                            </jet-action-message>

                            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                保存
                            </jet-button>
                        </template>
                    </jet-form-section>
                </div>
            </div>
        
    </app-layout>
</template>

<script>
    import AppLayout from '../../Layouts/AppLayout'
    import JetActionMessage from './../../Jetstream/ActionMessage'
    import JetButton from './../../Jetstream/Button'
    import JetFormSection from './../../Jetstream/FormSection'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetLabel from './../../Jetstream/Label'

    export default {
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },
        props:{
            bookmark: {
                type: Object,
            }
        },
        data() {
            return {
                form: this.$inertia.form({
                    title: this.bookmark.title,
                    number: this.bookmark.number,
                    completed: this.bookmark.completed,
                }, {
                    bag: 'editBookmark',
                }),
            }
        },

        methods: {
            editBookmark() {
                this.$inertia.put(route('bookmarks.update',this.bookmark.id),
                    this.form,
                    {
                        preserveScroll: true,
                        onSuccess: () => {
                            //
                        }
                    });
                /*
                this.form.put(route('bookmarks.update',this.bookmark.id), {
                    preserveScroll: true,
                    onSuccess: () => {
                        //
                    }
                })
                */
            },
        },
    }
</script>
