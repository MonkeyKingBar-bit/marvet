// Підключення з node_modules
import * as noUiSlider from 'nouislider';

// Підключення стилів з scss/base/forms/range.scss 
// у файлі scss/forms/forms.scss

// Підключення стилів з node_modules
// import 'nouislider/dist/nouislider.css';

export function rangeInit() {
	const priceSlider = document.querySelector('#range');
	const catPrice = document.querySelector('#count');
	if (priceSlider) {
		let textFrom = priceSlider.getAttribute('data-from');
		let textTo = priceSlider.getAttribute('data-to');
		noUiSlider.create(priceSlider, {
			start: [0,200000],
			connect: true,
			step: 1,
			range: {
				'min': 0,
				'max': 200000
			},
			/*
			format: wNumb({
				decimals: 0
			})
			*/
		});
		const priceStart = document.getElementById('price-start');
		const priceEnd = document.getElementById('price-end');
		const inputs = [priceStart, priceEnd];

		priceSlider.noUiSlider.on('update', function (values,handle) {
			inputs[handle].value = Math.round(values[handle]);
		})

		priceStart.addEventListener('change', setPriceValues);
		priceEnd.addEventListener('change', setPriceValues);
		function setPriceValues() {
			let priceStartValue;
			let priceEndValue;
			if (priceStart.value !== '') {
				priceStartValue = priceStart.value;
			}
			if (priceEnd.value !== '') {
				priceEndValue = priceEnd.value;
			}
			priceSlider.noUiSlider.set([priceStartValue, priceEndValue]);
		}
	}
}
rangeInit();
