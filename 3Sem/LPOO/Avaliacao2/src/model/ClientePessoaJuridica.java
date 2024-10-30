package model;

import java.util.List;

public class ClientePessoaJuridica extends Cliente {
	private String cnpj;

	public ClientePessoaJuridica(String nomeCompleto, String email, String telefone,
			List<Pedido> pedidos, EnderecoDeCobranca enderecosCobrancas,
			EnderecoDeEntrega enderecosEntregas, String cnpj) {
		super(nomeCompleto, email, telefone, pedidos, enderecosCobrancas, enderecosEntregas);
		this.cnpj = cnpj;
	}

	public String getCnpj() {
		return cnpj;
	}

	public void setCnpj(String cnpj) {
		this.cnpj = cnpj;
	}

	@Override
	public String toString() {
		return "ClientePessoaJuridica{" +
				"cnpj='" + cnpj + '\'' +
				", nomeCompleto='" + nomeCompleto + '\'' +
				", email='" + email + '\'' +
				", telefone='" + telefone + '\'' +
				", pedidos=" + pedidos +
				", enderecosCobrancas=" + enderecosCobrancas +
				", enderecosEntregas=" + enderecosEntregas +
				'}';
	}
}
