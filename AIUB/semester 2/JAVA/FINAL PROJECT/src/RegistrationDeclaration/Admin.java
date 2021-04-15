package RegistrationDeclaration;

public class Admin extends User
{
    final String masterKey = "admin";

    User[] users = new User[100];
    Admin[] admins = new Admin[10];

    public void insertUser(User user){
        for(int i = 0; i < users.length; i++){
            if(users[i] == null){
                users[i] = user;
                break;
            }
        }
    }

    public void deleteUser(String username){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getUsername().equals(username)){
                users[i] = users[i+1];
            }
        }
    }

    public void showAllUser(){
        int countUser = 0;
        System.out.println("-----------------------------------------------------------------");
        System.out.println("|                      ALL USERS INFORMATION                    | ");
        System.out.println("-----------------------------------------------------------------");
        for(int i = 0; i < users.length; i++){
            if(users[i] != null){
                countUser++;
                System.out.println();
                System.out.println("User " + countUser + " : ");
                System.out.println("Full Name : "+ users[i].getFullName());
                System.out.println("Username : "+ users[i].getUsername());
                System.out.println("Email : "+ users[i].getMailAddress());
                System.out.println("Mobile : "+ users[i].getMobile());
                System.out.println("Password : "+ users[i].getPassword());
            }
        }
        if(countUser == 0) System.out.println("No user found in the record!!");
    }

    public boolean usernameValidation(String username){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getUsername().equals(username)) return true;
        }
        return false;
    }

    public boolean emailValidation(String mail){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getMailAddress().equals(mail)) return true;
        }
        return false;
    }
    public void searchUser(String username){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getUsername().equals(username)){
                System.out.println();
                System.out.println("User stored at index " + i);
                System.out.println("Full Name : "+ users[i].getFullName());
                System.out.println("Username : "+ users[i].getUsername());
                System.out.println("Email : "+ users[i].getMailAddress());
                System.out.println("Mobile : "+ users[i].getMobile());
                System.out.println("Password : "+ users[i].getPassword());
            }
        }
    }
    public boolean passwordValidation(String username){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getPassword().equals(username)) return true;
        }
        return false;
    }
    public String getMasterKey(){ return masterKey; }

    public boolean adminUsernameValidation(String username){
        for(int i = 0; i < admins.length; i++){
            if(admins[i] != null && admins[i].getUsername().equals(username)) return true;
        }
        return false;
    }
    public boolean adminPasswordValidation(String username){
        for(int i = 0; i < admins.length; i++){
            if(admins[i] != null && admins[i].getPassword().equals(username)) return true;
        }
        return false;
    }
    public void insertAdmin(Admin admin){
        for(int i = 0; i < admins.length; i++){
            if(admins[i] == null){
                admins[i] = new Admin();
                admins[i] = admin;
                break;
            }
        }
    }

    public void showAlladmin(){
        int countUser = 0;
        System.out.println("-----------------------------------------------------------------");
        System.out.println("|                      ALL ADMIN INFORMATION                    | ");
        System.out.println("-----------------------------------------------------------------");
        for(int i = 0; i < admins.length; i++){
            if(admins[i] != null){
                countUser++;
                System.out.println();
                System.out.println("User " + countUser + " : ");
                System.out.println("Username : "+ admins[i].getUsername());
                System.out.println("Password : "+ admins[i].getPassword());
            }
        }
        if(countUser == 0) System.out.println("No admin found in the record!!");
    }
}
