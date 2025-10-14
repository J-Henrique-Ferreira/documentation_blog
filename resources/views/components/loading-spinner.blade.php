<div id="loading-spinner" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="w-16 h-16 border-4 border-unicred-green-dark border-t-transparent 
            rounded-full glow-spin">
    </div>
</div>

<style>
    .glow-spin {
        animation: glowSpin .8s linear infinite;
    }

    @keyframes glowSpin {
        0% {
            transform: rotate(0deg);
            /* box-shadow: 0 0 0px #ffffff33; */
        }

        50% {
            /* box-shadow: 0 0 16px #ffffffaa; */
        }

        100% {
            transform: rotate(360deg);
            /* box-shadow: 0 0 0px #ffffff33; */
        }
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const spinner = document.getElementById("loading-spinner");

        // Mostrar spinner em navegações normais
        document.addEventListener("click", function (e) {
            // Verificar se o clique foi em um link que não seja download, nova aba, etc.
            const link = e.target.closest("a");
            if (
                link &&
                !link.hasAttribute("download") &&
                link.target !== "_blank" &&
                !link.classList.contains("no-spinner") &&
                link.href &&
                link.href.indexOf("#") !== link.href.length - 1 &&
                link.href.indexOf("javascript:") !== 0 &&
                link.href.indexOf(window.location.origin) === 0
            ) {
                spinner.classList.remove("hidden");
            }
        });

        // Mostrar spinner em envios de formulários
        document.addEventListener("submit", function (e) {
            if (!e.target.classList.contains("no-spinner")) {
                spinner.classList.remove("hidden");
            }
        });

        // Interceptar requisições AJAX
        const originalFetch = window.fetch;
        window.fetch = function () {
            spinner.classList.remove("hidden");
            return originalFetch
                .apply(this, arguments)
                .then((response) => {
                    spinner.classList.add("hidden");
                    return response;
                })
                .catch((error) => {
                    spinner.classList.add("hidden");
                    throw error;
                });
        };

        // Interceptar XMLHttpRequest
        const originalXHROpen = XMLHttpRequest.prototype.open;
        XMLHttpRequest.prototype.open = function () {
            this.addEventListener("loadstart", function () {
                spinner.classList.remove("hidden");
            });

            this.addEventListener("loadend", function () {
                spinner.classList.add("hidden");
            });

            originalXHROpen.apply(this, arguments);
        };

        // Esconder spinner quando a página terminar de carregar
        window.addEventListener("load", function () {
            spinner.classList.add("hidden");
        });

        // Esconder spinner quando o usuário pressionar ESC
        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") {
                spinner.classList.add("hidden");
            }
        });
    });
</script>