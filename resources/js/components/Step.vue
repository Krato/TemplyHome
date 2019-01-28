<template>
    <div class="step-wrap relative bg-white shadow-md rounded-lg p-6">
        <div class="inner-wrap text-center text-grey-darkest">
            <h1 class="mb-8 text-left step-header">
                <slot name="title"></slot>
            </h1>
            <div class="flex flex-wrap">
                <div class="step-image w-1/2 p-12">

                    <slot name="icon"></slot>
                    
                </div>
                <div class="step w-1/2 p-4  self-center">
                    <slot name="content"></slot>
                </div>
            </div>
            
        </div>
    </div>

</template>

<script> 
export default {
    data: () => ({
        //
    }),
};
</script>