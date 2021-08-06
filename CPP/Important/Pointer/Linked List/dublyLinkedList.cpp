#include<iostream>

using namespace std;

struct Node{
  public:
    int key;
    int data;
    Node * next;
    Node * previous;

  Node(){
    key = 0;
    data = 0;
    next = NULL;
    previous = NULL;
  }

  Node(int k, int d) {
    key = k;
    data = d;
  }

};

struct DoublyLinkedList {

  public:
    Node * head;

  DoublyLinkedList() {
    head = NULL;
  }
//   DoublyLinkedList(Node * n) {
//     head = n;
//   }


  Node * nodeExists(int k) {
    Node * temp = NULL;
    Node * ptr = head;

    while (ptr != NULL) {
      if (ptr->key == k) {
        temp = ptr;
      }
      ptr = ptr->next;
    }

    return temp;
  }


  void appendNode(Node * n) {
    if (nodeExists(n->key) != NULL) {
      cout << "Node Already exists with key value : " << n->key << ". Append another node with different Key value" << endl;
    } else {
      if (head == NULL) {
        head = n;
        cout << "Node Appended as Head Node" << endl;
      } else {
        Node * ptr = head;
        while (ptr->next != NULL) {
          ptr = ptr->next;
        }
        ptr->next = n;
        n->previous = ptr;
        cout << "Node Appended" << endl;
      }
    }
  }


  void deleteNodeByKey(int k) {
    Node * ptr = nodeExists(k);
    if (ptr == NULL) {
      cout << "No node exists with key value: " << k << endl;
    } else {

      if (head->key == k) {
        head = head->next;
        cout << "Node UNLINKED with keys value : " << k << endl;
      } else {
        Node * nextNode = ptr->next;
        Node * prevNode = ptr->previous;
        // deleting at the end
        if (nextNode == NULL) {

          prevNode->next = NULL;
          cout << "Node Deleted at the END" << endl;
        }

        
        else {
          prevNode->next = nextNode;
          nextNode->previous = prevNode;
          cout << "Node Deleted in Between" << endl;

        }
      }
    }
  }


  void printList() {
    if (head == NULL) {
      cout << "No Nodes in Doubly Linked List";
    } else {
      cout << endl << "Doubly Linked List Values : ";
      Node * temp = head;

      while (temp != NULL) {
        cout << "(" << temp->key << "," << temp->data << ") <--> ";
        temp = temp->next;
      }
    }

  }

};

int main() {

  DoublyLinkedList obj;
  int option;
  int key1, k1, data1;
  do {
    cout << "\nWhat operation do you want to perform? Select Option number. Enter 0 to exit." << endl;
    cout << "1. appendNode()" << endl;
    cout << "2. deleteNodeByKey()" << endl;
    cout << "3. print()" << endl;
    cout << "4. Clear Screen" << endl << endl;

    cin >> option;
    Node * n1 = new Node();
    //Node n1;

    switch (option) {
    case 0:
      break;
    case 1:
      cout << "Append Node Operation \nEnter key & data of the Node to be Appended" << endl;
      cin >> key1;
      cin >> data1;
      n1->key = key1;
      n1->data = data1;
      obj.appendNode(n1);
      break;

    case 2:

      cout << "Delete Node By Key Operation - \nEnter key of the Node to be deleted: " << endl;
      cin >> k1;
      obj.deleteNodeByKey(k1);
      break;

    case 3:
      obj.printList();
      break;

    case 4:
      system("cls");
      break;

    default:
      cout << "Enter Proper Option number " << endl;
    }

  } while (option != 0);

  return 0;
}