package Module2;
import java.lang.*;
public class ScienceFiction implements IBook
{
	public ScienceFiction()
	{
		 System.out.println("This books available in Science Fiction Sector:");
	}
	public void showAll()
	{
      System.out.println("");
     
	 String Sc[]={"1)Book Name:The War of the Worlds,Writer Name: H. G. Wells,Book ID: 301\n",
	 "2)Book Name: Frankenstein, or, The Modern Prometheus,Writer Name: Mary Wollstonecraft Shelley,Book ID: 302\n",
	 "3)Book Name: Nineteen Eighty-Four,Writer Name: George Orwell,Book ID: 303\n",
	 "4)Book Name: Fahrenheit 451,Writer Name: Ray Bradbury,Book ID: 304\n",
	 "5)Book Name: Brave New World,Writer Name: Aldous Huxley,Book ID: 305\n",
     "6)Book Name: The Time Machine,Writer Name: H. G. Wells,Book ID: 306\n",
     "7)Book Name: The Invisible Man,Writer Name: H. G. Wells,Book ID: 307\n",
     "8)Book Name: A Wrinkle in Time,Writer Name: Madeleine L'Engle,Book ID: 308\n",
     "9)Book Name: Slaughterhouse-Five,Writer Name: Kurt Vonnegut,Book ID: 309\n",
     "10)Book Name:Twenty Thousand Leagues Under the Sea,Writer Name: Jules Verne,Book ID: 310\n"};

       for (int i=0; i< Sc.length;i++)
		{

            System.out.println(Sc[i]);

        }
	}
}