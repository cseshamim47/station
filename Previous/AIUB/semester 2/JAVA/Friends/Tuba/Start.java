import java.lang.*;

public class Start
{
	public static void main(String args[])
	{
		StoryBook s1 = new StoryBook("SB_1","NEW","TUBA",200.75, 60,"Nobel");
		s1.showDetails();
		s1.addQuantity (30);
		
		StoryBook s2=new StoryBook("SB_2","Again","Denial",600.75, 80," Thriller");
		s2.showDetails();
		
		TextBook t1=new TextBook("TB_1","TMRW","Raka",350.75, 70, 2017);
		t1.showDetails();
		t1.sellQuantity (20);
		
		TextBook t2=new TextBook("TB_2","TM COME","ROBB",960.75, 300, 2020);
		t2.showDetails();
	}
}
