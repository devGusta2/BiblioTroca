<?php
require('../dao/conexao.php');
    include('protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/cadastroUser.css">
    <title>Cadastro</title>
</head>
    <body>
    <div id="fade" class="hide">
      <div id="loader" class="spinner-border text-info hide" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <div id="message" class="hide">
        <div class="alert alert-light" role="alert">
          <h4>Mensagem:</h4>
          <p></p>
          <button id="close-message" type="button" class="btn btn-secondary">
            Fechar
          </button>
        </div>
      </div>
      </div>
        <div class="box">
            <form enctype="multipart/form-data" action="SalvarCadastro2.php" method="post">
                <h2>Quase lá</h2>
                <div class="box-form">
                    <div class="box-form-1">
                        <div class="inputBox">
                            <input type="text" name="cpf" id="" required="required" oninput="maskCPF(this)" maxLength="14">
                            <span for="cep">CPF</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="cep" id="cep" required="required">
                            <span>CEP</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="address" id="address" required="required">
                            <span for="address">Rua</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="complement" id="complement" required="required">
                            <span for="complement">Complemento</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="city" id="city" required="required">
                            <span for="city">Cidade</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="number" id="number" required="required">
                            <span for="number">Número da residência</span>
                            <i></i>
                        </div>
                    </div>
                    <div class="box-form-2">
                        <div class="inputBox">
                            <input type="text" name="neighborhood" id="neighborhood" required="required">
                            <span for="neighborhood">Bairro</span>
                            <i></i>
                        </div>
                        <div class="inputBox3">
                            <select class="" id="region"
                            >
                            <option selected>Estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <input type="tel" name="tel"  onkeyup="handlePhone(event)" id="" maxlength="15" required="required">
                            <span>Telefone</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="apelido" required="required">
                            <span>Apelido</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="number" name="idade" required="required">
                            <span>Idade</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input name="bio" id="textArea" required="required">
                            <span>Biografia</span>
                            <i></i>
                        </div>
                    </div>
                    <div class="box-form-3">
              
                        <label>Gêneros Interesados:</label>
                        <div class="genero">
                            <div class="itens">
                                <div class="checkbox"><input type="checkbox" name="terror" value=Terror> Terror</div>
                                <div class="checkbox"><input type="checkbox" name="romance" value=Romance> Romance</div>
                                <div class="checkbox"><input type="checkbox" name="acao" value=Ação> Ação</div>
                                <div class="checkbox"><input type="checkbox" name="misterio" value=Mistério> Mistério</div>
                                <div class="checkbox"><input type="checkbox" name="poesia" value=Poesia> Poesia</div>
                                <div class="checkbox"><input type="checkbox" name="historia" value=História> História</div>
                                <div class="checkbox"><input type="checkbox" name="conto" value=Conto> Conto</div>
                                <div class="checkbox"><input type="checkbox" name="ciencia" value=Ciência> Ciência</div>
                            </div>
                            <div class="itens">
                                <div class="checkbox"><input type="checkbox" name="humor" value=Humor> Humor</div>
                                <div class="checkbox"><input type="checkbox" name="biografia" value=Biografia> Biografia</div>
                                <div class="checkbox"><input type="checkbox" name="fantasia" value=Fantasia> Fantasia</div>
                                <div class="checkbox"><input type="checkbox" name="arte" value=Arte> Arte</div>
                                <div class="checkbox"><input type="checkbox" name="tecnologia" value=Tecnologia> Tecnologia</div>
                                <div class="checkbox"><input type="checkbox" name="ficcao" value=Ficção científica> Ficção científica</div>
                                <div class="checkbox"><input type="checkbox" name="espiritualidade" value=Espiritualidade> Espiritualidade</div>
                                <div class="checkbox"><input type="checkbox" name="guias" value=Guias> Guias</div>
                            </div>
                        </div>


                        <label>Sexo:</label>
                        
                        <select name="sexo" id="" class="inputBox2">
                            <option value="feminino">Feminino</option>
                            <option value="masculino">Masculino</option>
                        </select>

                        <label>Adicionar Foto:</label>

                        <div class="inputBox2">
                            <input type="file" placeholder="Adicionar Foto" class="file" name="arquivoUser" id="">  
                        </div>
                                
                        <input class="button" type="submit" value="Finalizar">
                    </div>
                </div>
            </form>
        </div>

        <script src='../js/script.js'></script>

        <script>

            //
            const handlePhone = (event) => {
                let input = event.target
                input.value = phoneMask(input.value)
                }

            const phoneMask = (value) => {
                if (!value) return ""
                value = value.replace(/\D/g,'')
                value = value.replace(/(\d{2})(\d)/,"($1) $2")
                value = value.replace(/(\d)(\d{4})$/,"$1-$2")
                return value
            }


                //BUSCA CEP
                const addressForm = document.querySelector("#address-form");
                const cepInput = document.querySelector("#cep");
                const addressInput = document.querySelector("#address");
                const cityInput = document.querySelector("#city");
                const neighborhoodInput = document.querySelector("#neighborhood");
                const regionInput = document.querySelector("#region");
                const formInputs = document.querySelectorAll("[data-input]");

                const closeButton = document.querySelector("#close-message");

                // Validate CEP Input
                cepInput.addEventListener("keypress", (e) => {
                const onlyNumbers = /[0-9]|\./;
                const key = String.fromCharCode(e.keyCode);

                console.log(key);

                console.log(onlyNumbers.test(key));

                // allow only numbers
                if (!onlyNumbers.test(key)) {
                    e.preventDefault();
                    return;
                }
                });

                // Evento to get address
                cepInput.addEventListener("keyup", (e) => {
                const inputValue = e.target.value;

                //   Check if we have a CEP
                if (inputValue.length === 8) {
                    getAddress(inputValue);
                }
                });

                // Get address from API
                const getAddress = async (cep) => {
                toggleLoader();

                cepInput.blur();

                const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

                const response = await fetch(apiUrl);

                const data = await response.json();

                console.log(data);
                console.log(formInputs);
                console.log(data.erro);

                // Show error and reset form
                if (data.erro === "true") {
                    if (!addressInput.hasAttribute("disabled")) {
                    toggleDisabled();
                    }

                    addressForm.reset();
                    toggleLoader();
                    toggleMessage("CEP Inválido, tente novamente.");
                    return;
                }

                // Activate disabled attribute if form is empty
                if (addressInput.value === "") {
                    toggleDisabled();
                }

                addressInput.value = data.logradouro;
                cityInput.value = data.localidade;
                neighborhoodInput.value = data.bairro;
                regionInput.value = data.uf;

                toggleLoader();
                };

                // Add or remove disable attribute
                const toggleDisabled = () => {
                if (regionInput.hasAttribute("disabled")) {
                    formInputs.forEach((input) => {
                    input.removeAttribute("disabled");
                    });
                } else {
                    formInputs.forEach((input) => {
                    input.setAttribute("disabled", "disabled");
                    });
                }
                };

                // Show or hide loader
                const toggleLoader = () => {
                const fadeElement = document.querySelector("#fade");
                const loaderElement = document.querySelector("#loader");

                fadeElement.classList.toggle("hide");
                loaderElement.classList.toggle("hide");
                };

                // Show or hide message
                const toggleMessage = (msg) => {
                const fadeElement = document.querySelector("#fade");
                const messageElement = document.querySelector("#message");

                const messageTextElement = document.querySelector("#message p");

                messageTextElement.innerText = msg;

                fadeElement.classList.toggle("hide");
                messageElement.classList.toggle("hide");
                };

                // Close message modal
                closeButton.addEventListener("click", () => toggleMessage());

                // Save address
                addressForm.addEventListener("submit", (e) => {
                e.preventDefault();

                toggleLoader();

                setTimeout(() => {
                    toggleLoader();

                    toggleMessage("Endereço salvo com sucesso!");

                    addressForm.reset();

                    toggleDisabled();
                }, 1000);
                });

        </script>
    </body>
</html>