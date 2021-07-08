#include <iostream>
#include <string>
#define size 1000
using namespace std;

class DocumentClass
{
    string document[size];
    int lineCount = 0;

public:
    void insertAtLast(string line)
    {
        if (lineCount == size - 1)
        {
            cout << "Memory Full! Can't insert more lines\n";
            return;
        }

        document[lineCount++] = line;
    }

    void insertAtAnyPosition(int pos, string line)
    {
        if (lineCount == size - 1)
        {
            cout << "Memory Full! Can't insert more lines\n";
            return;
        }

        if (pos < 0 || pos >= lineCount)
        {
            cout << "Wrong position inserted\n";
            return;
        }

        int i;
        for (i = lineCount; i > pos; i--)
        {
            document[i] = document[i - 1];
        }
        document[pos] = line;
        lineCount++;
    }

    void update(int pos, string newLine)
    {
        if (pos < 0 || pos >= lineCount)
        {
            cout << "Wrong position inserted\n";
            return;
        }

        document[pos] = newLine;
    }

    void deleteAtAnyPosition(int pos)
    {
        if (lineCount == 0)
        {
            cout << "Can't delete! Document is empty\n";
            return;
        }

        if (pos < 0 || pos >= lineCount)
        {
            cout << "Wrong position inserted\n";
            return;
        }

        int i;
        for (i = pos; i < lineCount - 1; i++)
        {
            document[i] = document[i + 1];
        }
        lineCount--;
    }

    void printDocument()
    {
        if (lineCount == 0)
            cout << "Document is Empty\n";
        else
        {
            int i;
            cout << "\n\n-----Document Start-----\n";
            for (i = 0; i < lineCount; i++)
            {
                cout << i << ". " << document[i] << endl;
            }
            cout << "-----Document End-----\n\n";
        }
    }
};

class UndoRedo
{
    DocumentClass *memory = new DocumentClass[1000];
    //An Array of object type to save the documents
    //Add any required variable here.
    int top = -1;

public:
    void saveLastChange(DocumentClass d)
    {
        //Write your code here
        memory[++top] = d;
        
    }

    DocumentClass getLastChange()
    {
            return memory[top--];
    }

    bool isEmpty()
    {
        if (top == -1)
            return true;
        else
            return false;
    }
};

int main()
{
    DocumentClass doc;
    UndoRedo undo;
    UndoRedo redo;
    cout << "[a. Insert a Line at the End]\n";
    cout << "[b. Insert at a specific Line]\n";
    cout << "[c. Change a specific Line]\n";
    cout << "[d. Delete a specific Line]\n";
    cout << "[e. Print Document]\n";
    cout << "[f. Undo]\n";
    cout << "[g. Redo]\n";
    cout << "[h. Exit Program]\n";
    while (1)
    {
        doc.printDocument();

        cout << "\nChoose your desired option[a/b/c/d/e/f]: ";
        char op;
        cin >> op;

        string line;
        cout << endl;

        if (op == 'a')
        {
            undo.saveLastChange(doc);
            cout << "Enter your new line: ";
            cin.ignore();
            getline(cin, line);
            doc.insertAtLast(line);
        }
        else if (op == 'b')
        {
            undo.saveLastChange(doc);
            int pos;
            cout << "Enter line number: ";
            cin >> pos;
            cout << "Enter your Text: ";
            cin.ignore();
            getline(cin, line);
            doc.insertAtAnyPosition(pos, line);
        }
        else if (op == 'c')
        {
            undo.saveLastChange(doc);
            cout << "Enter the line number: ";
            int pos;
            cin >> pos;
            cout << "Enter your new Text: ";
            cin.ignore();
            getline(cin, line);
            doc.update(pos, line);
        }
        else if (op == 'd')
        {
            undo.saveLastChange(doc);
            cout << "Enter the line number: ";
            int pos;
            cin >> pos;
            doc.deleteAtAnyPosition(pos);
        }
        else if (op == 'e')
        {
            doc.printDocument();
        }
        else if (op == 'f')
        {
            //Implement Undo logic here
            if (undo.isEmpty())
            {
                cout << "No Change to Undo\n";
            }
            else
            {
                redo.saveLastChange(doc);
                doc = undo.getLastChange();
            }
        }
        else if (op == 'g')
        {
            //Implement Redo logic here
            if (redo.isEmpty())
            {
                cout << "No Change to Redo\n";
            }
            else
            {
                undo.saveLastChange(doc);
                doc = redo.getLastChange();
            }
        }
        else if (op == 'h')
        {
            break;
        }
        else
        {
            cout << "You have inputted a wrong option\n";
        }
    }
    return 0;
}


// Stack Data Structure