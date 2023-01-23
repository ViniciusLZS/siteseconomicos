const cpf = document.querySelector('.cpf');
const valueCpf = cpf.innerText;

//retira os caracteres indesejados...
const modifCpf = valueCpf.replace(/[^\d]/g, "");

//realizar a formatação...
const formatCpf = modifCpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");

cpf.innerText = formatCpf;