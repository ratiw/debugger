<template>
    <div class="text-xs cursor-pointer" @click="collapsed = !collapsed">
        <div class="border-b bg-gray-50 p-1 px-3 flex space-x-2 justify-between items-start">
            <div class="text-gray-700 break-all font-semibold">
                {{ file.filename }}
                <span v-if="file.function" class="text-gray-400">in</span>
                {{ file.function || null }}
                <span v-if="file.function" class="text-gray-400">at line</span>
                {{ file.lineno }}
            </div>
            <div class="w-4 h-4 border border-gray-300 bg-white py-1 rounded">
                <svg viewBox="0 0 16 16"
                     fill="currentColor"
                     height="100%" width="100%"
                     :class="{'transform rotate-180': !collapsed}"
                >
                    <path d="M14,11.75a.74.74,0,0,1-.53-.22L8,6.06,2.53,11.53a.75.75,0,0,1-1.06-1.06l6-6a.75.75,0,0,1,1.06,0l6,6a.75.75,0,0,1,0,1.06A.74.74,0,0,1,14,11.75Z"></path>
                </svg>
            </div>
        </div>
        <div class="bg-gray-800 p-2 overflow-x-scroll" v-if="!collapsed">
            <div class="flex text-gray-100" v-for="(line, i) in file.pre_context">
                <div class="w-12">{{ file.lineno - (file.pre_context.length - i) }}.</div>
                <pre>{{ line }}</pre>
            </div>

            <div class="flex bg-pink-800 text-white">
                <div class="w-12">{{ file.lineno }}.</div>
                <pre>{{ file.context_line }}</pre>
            </div>
            <div class="flex text-gray-100" v-for="(line, i) in file.post_context">
                <div class="w-12">{{ file.lineno + i + 1 }}.</div>
                <pre>{{ line }}</pre>
            </div>
        </div>
    </div>
</template>

<script>
import SshPre from 'simple-syntax-highlighter'

export default {
    components: {SshPre},
    props: {
        file: Object,
        collapsed: {
            type: Boolean,
            default: true
        }
    }
}
</script>
