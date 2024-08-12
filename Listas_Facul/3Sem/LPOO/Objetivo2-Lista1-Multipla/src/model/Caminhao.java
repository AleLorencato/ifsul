package model;

public class Caminhao extends Veiculo implements Automovel {
	private int capacidadeDeCarga;

	public int getCapacidadeDeCarga() {
		return capacidadeDeCarga;
	}

	public void setCapacidadeDeCarga(int capacidadeDeCarga) {
		this.capacidadeDeCarga = capacidadeDeCarga;
	}

	@Override
	public String toString() {
		return "Caminhao{" +
				"capacidadeDeCarga=" + capacidadeDeCarga +
				'}';
	}

	@Override
	public String getRenavam() {
		return "";
	}

	@Override
	public void setRenavam(String renavam) {

	}

	@Override
	public String getChassi() {
		return "";
	}

	@Override
	public void setChassi(String chassi) {

	}

	@Override
	public String getPlaca() {
		return "";
	}

	@Override
	public void setPlaca(String placa) {

	}
}
