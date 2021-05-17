package SetGet;

//package SetGet;
public class Teacher extends User{
    
    private int tid;
    private String designation;
    

    public void setTid(int tid){
        this.tid = tid;
    }

    public void setDesignation(String designation){
        this.designation = designation;
    }

    public int getTid(){
        return tid;
    }

    public String getDesignation(){
        return designation;
    }
    
    
    public void showInfo(){
        System.out.println("Teacher Name : "+getName());
        System.out.println("Teacher ID : "+getTid());
        System.out.println("Teacher Age : "+getAge());
        System.out.println("Teacher Designation : "+getDesignation());
        System.out.println();
    }
}
