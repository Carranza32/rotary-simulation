<template>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button">
                {{title}}
            </button>
        </h2>
        <div class="accordion-collapse show">
            <div class="accordion-body">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: String,
        title: String,
    },
}
</script>
