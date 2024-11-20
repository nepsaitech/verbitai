declare const verticalData: { id: string; };

document.addEventListener('DOMContentLoaded', getVerticalFromLocalStorage);

function getVerticalFromLocalStorage() {
    try {
        const id = verticalData.id;
        localStorage.setItem('vertical_id', id);
    } catch (error) {
        console.error("Failed:", error);
    }
}