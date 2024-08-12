package Model;

public class Passaro extends Animal{
	private double z;

	public Passaro() {}

	public Passaro(double x, double y, double z) {
		super(x, y);
		this.z = z;
	}

	public void mover(double x, double y, double z) {
		super.mover(x, y, z);
		this.z = z;
	}
	@Override
	public void desenhar() {
		System.out.println("\nDesenhou um Pássaro.");
	}
}
