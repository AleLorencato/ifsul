package Controller;
import Model.Animal;
import Model.Cachorro;
import Model.Passaro;
import Model.Peixe;

import java.util.ArrayList;
import java.util.List;
public class AnimalController {
	public static void main(String[] args) {

				List<Animal> animais = new ArrayList<>();
				animais.add(new Peixe(1.0, 2.0, 3.0));
				animais.add(new Peixe(4.0, 5.0, 6.0));
				animais.add(new Peixe(7.0, 8.0, 9.0));
				animais.add(new Passaro(1.0, 2.0, 3.0));
				animais.add(new Passaro(4.0, 5.0, 6.0));
				animais.add(new Passaro(7.0, 8.0, 9.0));
				animais.add(new Cachorro(1.0, 2.0));
				animais.add(new Cachorro(3.0, 4.0));
				animais.add(new Cachorro(5.0, 6.0));


				// a)
				for (Animal animal : animais) {
					animal.desenhar();
				}

				// b)
				for (Animal animal : animais) {
					animal.mover(2.0, 2.0, 5.0);
					animal.desenhar();
				}

				// c)
				for (Animal animal : animais) {
					if (animal instanceof Cachorro) {
						animal.mover(8.0, 8.0, 5.0);
						animal.desenhar();
					}
				}

				// d)
				for (Animal animal : animais) {
					if (animal instanceof Peixe || animal instanceof Passaro) {
						animal.mover(5.0, 5.0, 5.0);
						animal.desenhar();
					}
				}
			}
		}
