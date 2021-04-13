 
public class PrintTicket 
{
    PrintTicket(){}
    
    PrintTicket(int root) ///// Static Polymorphism
    {
        switch(root)
        {
            case 1:
            {
                ///// Bus
                break;
            }
            
            case 2:
            {
                ///// Train
                break;
            }
            
            case 3:
            {
                ///// Plane
                break;
            }
            
            case 4:
            {
                ///// Ship
                break;
            }
        }
        
    }
    
    
}
