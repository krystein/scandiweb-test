const select = document.getElementById("productType");
const container = document.getElementById("switcher");
const sku = document.getElementById("sku");
const saveButton = document.getElementById("save");
const productForm = document.getElementById("product_form");
const error = document.getElementById("error");

const setError = (msg) => {
  saveButton.value = "Save";
  error.innerText = msg;
};

(() => {
  productForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const selectedInput = Array.from(
      document.querySelectorAll(
        "#price, #size, #weight, #height, #width, #length"
      )
    );

    for (let i = 0; i < selectedInput.length; i++) {
      if (parseInt(selectedInput[i]?.value) < 0) {
        return setError(
          `Invalid ${selectedInput[i].id}! Negative value not allowed`
        );
      }

      if (!/^\d+(.\d+)?$/.test(selectedInput[i]?.value)) {
        return setError(`Invalid ${selectedInput[i].id}! Must be a number`);
      }
    }

    const req = await fetch(`../api/validatesku/?sku=${sku.value}`);
    const res = await req.json();

    if (!res) {
      return setError("SKU is not unique");
    }

    productForm.submit();
  });
})();

const changeSwitcher = () => {
  if (select.value == "DVD") {
    container.innerHTML = `
           <div id="DVD">
                 <div class="form-group row">
                    <label class="col-sm col-form-label">Size (MB)</label>
                    <div>
                      <input type="text" name="size" id="size" class="input form-control" required />
                    </div>
                </div>
                <p class="">provide the product size</p>
           </div>
        `;
  } else if (select.value == "Book") {
    container.innerHTML = `
            <div id="Book">
                <div class="form-group row">
                    <label class="col-sm col-form-label">Weight (KG)</label>
                    <div>
                      <input type="text" name="weight" id="weight" class="input form-control" required />
                    </div>
                </div>
                <p class="">provide the product weight</p>
            </div>
        `;
  } else if (select.value == "Furniture") {
    container.innerHTML = `
           <div id="Furniture">
                 <div class="form-group row">
                    <label class="col-sm col-form-label">Height (CM)</label>
                    <div>
                      <input type="text" name="height" id="height" class="input form-control" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm col-form-label">Width (CM)</label>
                    <div>
                      <input type="text" name="width" id="width" class="input form-control" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm col-form-label">Length (CM)</label>
                    <div>
                      <input type="text" name="length" id="length" class="input form-control" required />
                    </div>
                </div>
                <p class="desc">provide the product dimensions HxWxL</p>
           </div>
        `;
  }
};
