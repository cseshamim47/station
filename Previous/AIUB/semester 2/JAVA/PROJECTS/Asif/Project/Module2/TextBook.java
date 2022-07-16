package Module2;
import java.lang.*;
public class TextBook extends BookInfo
{
	public TextBook()
	{
		 System.out.println("This books available in Text Book Sector:");
	}
	public void showAll()
	{
      System.out.println("");
      String Tb[]={"1)Book Name: Strengths Finder 2.0 (7th edition),Writer Name: Tom Rath, Book ID: 101\n",
	  "2)Book Name: Signing Naturally Unit 1-6 (rev edition), Writer Name: Cheri Smith, Ella Mae Lentz and Ken Mikos, Book ID: 102\n",
	  "3)Book Name: Publication Manual of the APA (6th edition),Writer Name: American Psychological Association—APA,Book ID: 103\n",
	  "4)Book Name: They Say, I Say (3rd edition),Writer Name: Gerald Graff, Book ID: 104\n", 
      "5)Book Name: Emergency Care (13th edition),Writer Name: Daniel J. Limmer, Michael F. OKeefe, Harvey Grant and Bob Murray, Book ID: 105\n", 
      "6)Book Name: Culture Counts (4th edition),Writer Name: Serena Nanda, Book ID: 106\n",
	  "7)Book Name: Microbiology (2nd edition),Writer Name: Anthony Strelkauskas, Book ID: 107\n",
      "8)Book Name: Microeconomics (10th edition),Writer Name: Colander, Book ID: 108\n",
      "9)Book Name: The Human Mosaic (12th edition),Writer Name: Mona Domosh, Book ID: 109\n",
	  "10)Book Name: Davis's Drug Guide for Nurses (15th edition),Writer Name: April Vallerand and Cynthia A. Sanoski, Book ID: 110\n"};

       for (int i=0; i< Tb.length;i++)
		{

            System.out.println(Tb[i]);

        }
	}
}