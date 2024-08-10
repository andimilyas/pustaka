import { onMounted, onUpdated } from "vue";

export function usePreline() {
    const initPreline = () => {
        if (typeof window !== "undefined" && typeof window.HSStaticMethods !== "undefined") {
            window.HSStaticMethods.autoInit();
        }
    }
    onMounted(() => {
        initPreline();
    });
    onUpdated(() => {
        initPreline();
    });

    return {
        initPreline
    }
}