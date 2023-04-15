<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $editing ? 'Edit Quiz' : 'Create Quiz' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form wire:submit.prevent="save">
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input wire:model.lazy="quiz.title" id="title" class="block mt-1 w-full" type="text" name="title" required />
                            <x-input-error :messages="$errors->get('quiz.title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="slug" value="Slug" />
                            <x-text-input wire:model.lazy="quiz.slug" id="slug" class="block mt-1 w-full" type="text" name="slug" />
                            <x-input-error :messages="$errors->get('quiz.slug')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" value="Description" />
                            <x-textarea wire:model.defer="quiz.description" id="description" class="block mt-1 w-full" type="text" name="description" />
                            <x-input-error :messages="$errors->get('quiz.description')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <x-input-label for="published" value="Published"/>
                                <input type="checkbox" id="published" class="mr-1 ml-2" wire:model.defer="quiz.published">
                            </div>
                            <x-input-error :messages="$errors->get('quiz.published')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <x-input-label for="public" value="Public"/>
                                <input type="checkbox" id="public" class="mr-1 ml-2" wire:model.defer="quiz.public">
                            </div>
                            <x-input-error :messages="$errors->get('quiz.public')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-primary-button>
                                Save
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
