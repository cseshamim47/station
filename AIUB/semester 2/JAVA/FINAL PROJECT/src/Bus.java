
public class Bus extends Vehicle //// Inheritance
{
    private String seatNo, ac;
    
    public Bus(){}//// Empty Constructor
    /// Parametrized Constructor Below
    public Bus(String vehicleName,String vehicleType,String member,String vehicleNo,String seatNo,String ac)
    {
        super(vehicleName,vehicleType,member,vehicleNo);
        this.seatNo =seatNo;
        this.ac =ac; // (Y/N)
    }
    
    /// Setter Methods
    
    public void setSeatNo(String seatNo)
    {
       this.seatNo =seatNo; 
    }

    public void setAc(String ac)
    {
       this.ac =ac; 
    }
    
    ///// Getter Methods
    
    public String getSeatNo()
    {
       return seatNo;
    }
    
    public String getAc()
    {
       return ac;
    }
    
    
    
}
