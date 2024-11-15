<x-app-layout x-data="{ open: false }">
<x-slot name="header">
    <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #6a0dad; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <h1 id="movingText" style="font-family: 'Arial', sans-serif; font-weight: 900; font-size: 3rem; color: white; text-transform: uppercase; letter-spacing: 4px; background: linear-gradient(to right, #6a0dad, #ff5733); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); animation: blinkMove 3s linear infinite;">
            PathToSuccess
        </h1>
    </div>
</x-slot>

<style>
    @keyframes blinkMove {
        0% {
            transform: translateX(-100%);
            color: #6a0dad;
        }
        50% {
            transform: translateX(50%);
            color: #ff5733;
        }
        100% {
            transform: translateX(100%);
            color: #6a0dad;
        }
    }

    #movingText {
        animation: blinkMove 3s linear infinite;
    }
</style>

<div style="position: relative; padding: 3rem 0; background: linear-gradient(to bottom right, #e3ffe7, #d9e7ff, #ffe3ff); min-height: 100vh;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
        <img src="{{ asset('Graduation-Party.jpeg') }}" alt="Graduation Party" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.6;">
    </div>

    <div style="position: relative; max-width: 64rem; margin: 0 auto; padding: 4rem; background-color: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border-radius: 1rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; z-index: 1;">
        <h1 style="font-size: 3.5rem; font-weight: 800; font-style: italic; color: #6a0dad; line-height: 1.2; text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">
            Welcome to Your Next Chapter!
        </h1>

        <p style="font-size: 1rem; font-style: italic; color: #718096; width: 70%; margin: 2rem auto; line-height: 1.5;">
            Step into a world of endless possibilities. Explore, learn, and unlock your full potential.
        </p>

        <!-- Replace buttons with the Graduation-Party image -->
        <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 2rem;">
            <img src="{{ asset('Graduation-Party.jpeg') }}" alt="Graduation Party" style="width: 70%; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.2);">
        </div>
    </div>

    <div style="position: absolute; bottom: 0; left: 0; width: 100%; background: linear-gradient(to top, #1e1e2f, transparent); padding: 2rem 0; text-align: center; color: white; z-index: 1;">
        <p style="font-size: 1rem; font-weight: 600; font-style: italic;">
            “The future belongs to those who believe in the beauty of their dreams.” – Eleanor Roosevelt
        </p>
    </div>
</div>
</x-app-layout>
