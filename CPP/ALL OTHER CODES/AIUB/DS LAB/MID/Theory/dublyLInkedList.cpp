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
  DoublyLinkedList(Node * n) {
    head = n;
  }


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

  Node * n1 = new Node();
  Node * n2 = new Node();
  Node * n3 = new Node();
  Node * n4 = new Node();
  Node * n5 = new Node();
  Node * n6 = new Node();
  Node * n7 = new Node();
  Node * n8 = new Node();
  Node * n9 = new Node();
  Node * n10 = new Node();

  n1->key = 1;
  n1->data = 10;
  obj.appendNode(n1);

  n2->key = 2;
  n2->data = 20;
  obj.appendNode(n2);

  
  n3->key = 3;
  n3->data = 30;
  obj.appendNode(n3);

  n4->key = 4;
  n4->data = 40;
  obj.appendNode(n4);
  
  n5->key = 5;
  n5->data = 50;
  obj.appendNode(n5);

  obj.printList();

  obj.deleteNodeByKey(1);  
  obj.deleteNodeByKey(2);  
  obj.deleteNodeByKey(3);  
  obj.deleteNodeByKey(4);  

  obj.printList();

  return 0;
}