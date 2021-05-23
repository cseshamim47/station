#include <bits/stdc++.h>
using namespace std;

class Node{
    public:
        int key, data;
        Node *next;
    Node(){
        key = 0;
        data = 0;
        next = NULL;
    }
    Node(int key, int data){
        this->key = key;
        this->data = data;
    }
};

class singlyLinkedList{
    public:
        Node *head;
    singlyLinkedList(){
        head = NULL;
    }
    singlyLinkedList(Node *n){
        head = n;
    }

    // 1. CHeck if node exists using key value
    Node *nodeExists(int key){
        Node *temp = NULL;
        Node *ptr = head;

        while(ptr != NULL){
            if(ptr->key == key){
                temp = ptr;
            }
            ptr = ptr->next;
        }
        return temp;
    }

    // 2. Append a node to the list
    void appendNode(Node *n){
        if(nodeExists(n->key) != NULL){
            printf("Node Already exists with key value : %d. Append another node with different Key value\n", n->key);
        }else{
            if(head == NULL){
                head = n;
                printf("Node Appended\n");
            }else {
                Node *ptr = head;
                while(ptr->next != NULL){
                    ptr = ptr->next;
                }
                ptr->next = n;
                printf("Node Appended\n");
            }
        }
    }

    // 3. Prepend Node - Attach a node at the start
    void prependNode(Node *n){
        if(nodeExists(n->key) != NULL){
            printf("Node Already exists with key value : %d. Append another node with different Key value\n", n->key);
        }else{
            n->next = head;
            head = n;
            printf("Node Prepended\n");
        }
    }

    // 4. Insert a Node after a particular node in the list
    void insertNodeAfter(int key, Node *n){
        Node *ptr = nodeExists(key);
        if(ptr == NULL){
            printf("No node exists with the key value: %d\n",key);
        }else{
            if(nodeExists(n->key) != NULL){
                printf("Node Already exists with key value : %d. Append another node with different Key value\n", n->key);
            }else{
                n->next = ptr->next;
                ptr->next = n;
                printf("Node Inserted!\n");
            }
        }
    }

    // 5. Delete node by unique key
    void deleteNodeByKey(int key){
        if(head == NULL){
            printf("Singly Linked List already Empty. Cant delete\n");
        }else if(head != NULL){
            if(head->key == key){
                head = head->next;
                printf("Node UNLINKED with keys value : %d\n",key);
            }else{
                Node *temp = NULL;
                Node *prevPtr = head;
                Node *currentPtr = head->next;
                while(currentPtr != NULL){ // 1 -> 2 -> 3 -> 4
                    if(currentPtr->key == key){
                        temp = currentPtr;
                        currentPtr = NULL;
                    }else{
                        prevPtr = prevPtr->next;
                        currentPtr = currentPtr->next;
                    }
                }
                if(temp != NULL){
                    prevPtr->next = temp->next;
                    printf("pNode UNLINKED with keys value : %d\n",key);
                }else{
                    printf("Node doesn't exists with the key value: %d\n",key);

                }
            }
        }
    }

    // 6th update node
    void updateNodeByKey(int key, int data){
        Node *ptr = nodeExists(key);
        if(ptr != NULL){
            ptr->data = data;
            printf("Node data updated successfully!\n");
        }else{
            printf("Node doesn't exist with key value : %d\n", key);
        }
    }

    // 7th printing
    void printList(){
        if(head == NULL){
            printf("No nodes in singly linked list!\n");
        }else{
            printf("Singly linked list values : ");
            Node *temp = head;
            
            while(temp != NULL){
                printf("(%d, %d) --> ",temp->key, temp->data);
                temp = temp->next;
            }
        }
    }
};

int main()
{
    singlyLinkedList linkedListObj;
    char option = 'c';
    int key, k, data;
    
    do {
        if(option == 'c') system("cls");
        cout << "\nWhat operation do you want to perform? Select Option number. Enter 0 to exit." << endl;
        cout << "1. appendNode()" << endl;
        cout << "2. prependNode()" << endl;
        cout << "3. insertNodeAfter()" << endl;
        cout << "4. deleteNodeByKey()" << endl;
        cout << "5. updateNodeByKey()" << endl;
        cout << "6. print()" << endl;
        cout << "7. Clear Screen" << endl << endl;

        cin >> option;
        Node *n = new Node();

        switch(option){
            case '0': break;
            case '1':
                cout << "Append Node Operation \nEnter key & data of the Node to be Appended" << endl;
                cin >> key >> data;
                n->key = key;
                n->data = data;
                linkedListObj.appendNode(n);
                //cout<<n1.key<<" = "<<n1.data<<endl;
                break;

            case '2':
                cout << "Prepend Node Operation \nEnter key & data of the Node to be Prepended" << endl;
                cin >> key >> data;
                n->key = key;
                n->data = data;
                linkedListObj.prependNode(n);
                break;

            case '3':
                cout << "Insert Node After Operation \nEnter key of existing Node after which you want to Insert this New node: " << endl;
                cin >> k;
                cout << "Enter key & data of the New Node first: " << endl;
                cin >> key;
                cin >> data;
                n->key = key;
                n->data = data;

                linkedListObj.insertNodeAfter(k, n);
                break;

            case '4':

                cout << "Delete Node By Key Operation - \nEnter key of the Node to be deleted: " << endl;
                cin >> k;
                linkedListObj.deleteNodeByKey(k);

                break;
            case '5':
                cout << "Update Node By Key Operation - \nEnter key & NEW data to be updated" << endl;
                cin >> key;
                cin >> data;
                linkedListObj.updateNodeByKey(key, data);

                break;
            case '6':
                linkedListObj.printList();

                break;
            case '7':
                system("cls");
                break;
            default:
                cout << "Enter Proper Option number " << endl;
        }

    }while (option != '0');
}