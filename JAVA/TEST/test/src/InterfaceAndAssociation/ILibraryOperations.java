package InterfaceAndAssociation;
import SetGet.*;
//import InterfaceAndAssociation.*;



public interface ILibraryOperations {
    void insertStudent(Student e);
    void removeStudent(int id);
    void showAllStudent();
    
    void insertTeacher(Teacher t);
    void removeTeacher(int id);
    void showAllTeacher();
    
    void insertLibrarian(Librarian l);
    void removeLibrarian(int id);
    void showAllLibrarian();
    
    void insertBook(Book b);
    void removeBook(int id);
    void showAllBook();
}
