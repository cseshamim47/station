package Module2;
import java.lang.*;
public class StoryBooks implements IBook
{
	public StoryBooks()
	{
		 System.out.println("This books available in Story Book Sector:");
	}
	public void showAll()
	{
      System.out.println("");
     
	 String Sb[]={"1)Book Name: The History of Tom Jones, Writer Name: Henry Fielding, Book ID: 201\n",
      "2)Book Name: Pride and Prejudice,Writer Name: Jane Austen,Book ID: 202\n",
      "3)Book Name: The Red and the Black,Writer Name: Stendhal,Book ID: 203\n",
      "4)Book Name: Le Pere Goriot,Writer Name: Honoré de Balzac,Book ID: 204\n",
      "5)Book Name: David Copperfield,Writer Name: Charles Dickens,Book ID: 205\n",
	  "6)Book Name: Madame Bovary,Writer Name: Gustave Flaubert,Book ID: 206\n",
      "7)Book Name: Moby-Dick,Writer Name: Herman Melville,Book ID: 207\n",
      "8)Book Name: Wuthering Heights, Writer Name: Emily Brontë,Book ID: 208\n",
      "9)Book Name: The Brothers Karamazov, Writer Name: Dostoevsky,Book ID: 209\n",
      "10)Book Name: War and Peace, Writer Name: Tolstoy,Book ID: 210 "};

       for (int i=0; i< Sb.length;i++)
		{

            System.out.println(Sb[i]);

        }
	}
}