#include <iostream>
using namespace std;

class BST
{
    int data;
    BST *left, *right;
public:
    BST();
    BST(int);
    BST* Insert(BST*,int);
    BST* Delete(BST*, int);
    bool Search(BST*,int);
    void inorder(BST*);
};
struct linkedList
{
    int data;
    linkedList *next;
};

// prototyping

BST* Insert(BST* root, int value);
void inorder(BST* root);
bool Search(BST* root,int data);
int arr[10];
BST bst, *root = NULL;
linkedList* bigHead = NULL;
void ll_insert(linkedList** head_ref,int data);
void ll_search(linkedList* head,int data);
void ll_print(linkedList* head);

void input();
void bubble_sort();
void print_bubble_sort();
void binary_search();
void bstSearch();
void linkedListAll();

int main()
{
    input();
    cout << "\n# BUBBLE SORT START #\n" << endl;
    bubble_sort();
    print_bubble_sort();
    binary_search();
    cout << "\n# BUBBLE SORT END #\n" << endl;

    cout << "# BST START #\n" << endl;
    cout << "INORDER : ";
    bst.inorder(root);
    bstSearch();
    cout << "\n# BST END #\n" << endl;

    cout << "# LINKED LIST START #\n" << endl;
    linkedListAll();
    cout << "\n# LINKED LIST END #\n" << endl;

    return 0;
}

// 50 30 20 40 70 60 80 100 200 300

// input
void input()
{
    int ten = 10;
    cout << "Enter 10 integers : ";
    while(ten != 0)
    {
        int in;
        cin >> in;
        arr[ten-1] = in; // 9 8 7 6 5 
        if(ten == 10)
            root = bst.Insert(root,in);
        else
            bst.Insert(root,in);
        ten--;
    }
}
// bubble sort

void bubble_sort()
{
    for(int i = 0; i < 10; i++){  
        bool isRequired = false;
        for (int j = 0; j < 10-i-1; j++)
        {
            if (arr[j] > arr[j + 1])
            {
                swap(arr[j], arr[j + 1]);
                isRequired = true;
            }
        }
        if(!isRequired) break;
    }
}

void print_bubble_sort()
{
    cout << "After sorting : ";
    for(int i = 0; i < 10; i++)
    {
        cout << arr[i] << " ";
    }
    cout << endl;
}

// binary search 

void binary_search()
{
    cout << "Binary Search : ";
    int key;
    cin >> key;
    int mid = 0, high = 10, low = 0;
    while(low < high)
    {
        mid = low + (high-low)/2;
        if(arr[mid] < key) low = mid+1;
        else high = mid;
    }
    if(arr[low] == key)
    {
        cout << key << " is found!!" << endl;
    }
    else
        cout << key << " not found!!" << endl;
}

// BST

BST::BST():data(0),left(NULL),right(NULL)
{
}
BST::BST(int value)
{
    data = value;
    left = right = NULL;
}

BST* BST::Insert(BST* root, int value)
{
    if(!root) return new BST(value);

    if(value > root->data)
        root->right = Insert(root->right,value);
    else root->left = Insert(root->left, value);
    return root;
}

void BST::inorder(BST* root)
{
    if(!root) return;
    inorder(root->left);
    cout << root->data << " ";
    inorder(root->right);
}

bool BST::Search(BST* root,int data)
{
    if(root == NULL) return false;
    if(root->data == data) return true;

    if(data < root->data)
        return Search(root->left,data);
    else
        return Search(root->right,data);
}

void bstSearch()
{
    cout << endl;
    int data;
    cout << "Enter key to search in BST : ";
    cin >> data;
    if(bst.Search(root,data)) cout << data << " found in BST!!" << endl;
    else cout << data << " not found in BST!!" << endl;
}

// linked list

void ll_insert(linkedList** head_ref,int data)
{
    linkedList *newNode = new linkedList();
    newNode->data = data;
    newNode->next = *head_ref;
    *head_ref = newNode;
}

void ll_search(linkedList* head,int data)
{
    while(head != NULL)
    {
        if(head->data == data)
        {
            cout << data << " is found in the linked list" << endl;
            return;
        }
        head = head->next;
    }
    cout << data << " not found in the linked list!!" << endl;
}

void ll_print(linkedList* head)
{
    if(!head) cout << "Linked list Empty!!" << endl;
    else cout << "Linked List : ";
    while(head != NULL)
    {
        cout << head->data << " ";
        head = head->next;
    }
    cout << "\n";
}

void linkedListAll()
{
    for(int i = 9; i >= 0; i--)
    {
        ll_insert(&bigHead,arr[i]);
    }
    ll_print(bigHead);
    cout << "Enter data to search in Linked List : ";
    int data;
    cin >> data;
    ll_search(bigHead,data);
}