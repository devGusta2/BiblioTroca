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
    <link rel="stylesheet" href="../css/cadastro2.css">
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

    <div class="container">
        <div class="form">
            <form enctype="multipart/form-data" action="SalvarCadastro2.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <div class="login-button-image">
                            <img src="../images/icone.png">
                        </div>
                        <div>
                            <label for="arquivo">Adicionar Foto</label>
                            <input type="file" id="arquivo" name="arquivoUser">
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-group-colums">
                        <div class="input-box">
                            <label>CPF:</label>
                            <input type="text" name="cpf" id="" oninput="maskCPF(this)" maxLength="14" placeholder="000.000.000-00" required>
                        </div>

                        <div class="input-box">
                            <label>CEP:</label>
                            <input type="text" name="cep" id="cep" placeholder="0000-000" required>
                        </div>

                        <div class="input-box">
                            <label>Rua:</label>
                            <input type="text" name="address" id="address" placeholder="Digite sua rua" required>
                        </div>

                    </div>

                    <div class="input-group-colums">

                        <div class="input-box">
                            <label for="neighborhood">Bairro:</label>
                            <input type="text" name="bairro" id="neighborhood" placeholder="Digite seu bairro" required>
                        </div>

                        <div class="input-box">
                            <label for="city">Cidade:</label>
                            <input type="text" name="city" id="city" placeholder="Digite sua cidade" required>
                        </div>

                        <div class="input-box">
                            <label>Estado:</label>
                            <select class="" id="region"
                            >
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

                    </div>

                    <div class="input-group-colums">

                        <div class="input-box">
                            <label>Complemento:</label>
                            <input type="text" name="complement" id="complement" placeholder="Digite seu complemento" required>
                        </div>

                        <div class="input-box">
                            <label>Número da residência:</label>
                            <input type="text" name="number" id="number" placeholder="Digite o número" required>
                        </div>

                        <div class="input-box">
                            <label>Telefone:</label>
                            <input type="tel" name="tel"  onkeyup="handlePhone(event)" id="" maxlength="15" placeholder="(xx) xxxx-xxxx" required>
                        </div>

                    </div>

                    <div class="input-group-colums">

                        <div class="input-box">
                            <label>Apelido:</label>
                            <input type="text" name="apelido" placeholder="Digite um apelido" required>
                        </div>

                        <div class="input-box">
                            <label>Idade:</label>
                            <input type="number" name="idade" placeholder="Digite sua idade" required>
                        </div>

                        <div class="input-box">
                            <label>Biografia:</label>
                            <input name="bio" id="textArea" placeholder="Digite uma frase" required>
                        </div>
                    </div>
                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gêneros Interresados:</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-group-colums">

                            <div class="gender-input">
                                <input id="female" type="checkbox" name="gender">
                                <label for="female">Terror</label>
                            </div>
                            <div class="espaco"></div>
                            <div class="gender-input">
                                <input id="male" type="checkbox" name="gender">
                                <label for="male">Romance</label>
                            </div>

                        </div>

                        <div class="gender-group-colums">

                            <div class="gender-input">
                                <input id="others" type="checkbox" name="gender">
                                <label for="others">Ação</label>
                            </div>
                            <div class="espaco"></div>
                            <div class="gender-input">
                                <input id="none" type="checkbox" name="gender">
                                <label for="none">Mistério</label>
                            </div>

                        </div>

                        <div class="gender-group-colums">

                            <div class="gender-input">
                                <input id="female" type="checkbox" name="gender">
                                <label for="female">Poesia</label>
                            </div>
                            <div class="espaco"></div>
                            <div class="gender-input">
                                <input id="male" type="checkbox" name="gender">
                                <label for="male">História</label>
                            </div>

                        </div>

                        <div class="gender-group-colums">

                            <div class="gender-input">
                                <input id="others" type="checkbox" name="gender">
                                <label for="others">Conto</label>
                            </div>
                            <div class="espaco"></div>
                            <div class="gender-input">
                                <input id="none" type="checkbox" name="gender">
                                <label for="none">Ciência</label>
                            </div>

                        </div>

                        <div class="gender-group-colums">

                            <div class="gender-input">
                                <input id="female" type="checkbox" name="gender">
                                <label for="female">Humor</label>
                            </div>
                            <div class="espaco"></div>
                            <div class="gender-input">
                                <input id="male" type="checkbox" name="gender">
                                <label for="male">Biografia</label>
                            </div>

                        </div>

                        <div class="gender-group-colums">

                            <div class="gender-input">
                                <input id="others" type="checkbox" name="gender">
                                <label for="others">Arte</label>
                            </div>
                            <div class="espaco"></div>
                            <div class="gender-input">
                                <input id="none" type="checkbox" name="gender">
                                <label for="none">Fantasia</label>
                            </div>

                        </div>

                        <div class="gender-group-colums">

                            <div class="gender-input">
                                <input id="female" type="checkbox" name="gender">
                                <label for="female">Guias</label>
                            </div>
                            <div class="espaco"></div>
                            <div class="gender-input">
                                <input id="male" type="checkbox" name="gender">
                                <label for="male">Tecnologia</label>
                            </div>

                        </div>

                        <div class="gender-group-colums">

                            <div class="gender-input">
                                <input id="others" type="checkbox" name="gender">
                                <label for="others">Espiritualidade</label>
                            </div>
                            <div class="espaco"></div>
                            <div class="gender-input">
                                <input id="none" type="checkbox" name="gender">
                                <label for="none">Ficção</label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="continue-button">
                    <input type="submit" value="Finalizar">
                </div>
            </form>
        </div>
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