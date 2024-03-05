const int N = 2;
struct node{
    node* arr[N];
};
node* getNode()
{
    node* root = new node();
    root->arr[0] = NULL;
    root->arr[1] = NULL;
    return root;
}

void insert(node* root, int n)
{   
    node *tempRoot = root;
    for(int i = 31; i >= 0; i--)
    {
        int index = ((n >> i) & 1);
        if(tempRoot->arr[index] == NULL)
        {
            tempRoot->arr[index] = getNode();
        }
        tempRoot = tempRoot->arr[index];
    }
}

int search(node* root, int n)
{
    node* tempRoot = root;
    int res = 0;
    for(int i = 31; i >= 0; i--)
    {
       int index = ((n>>i)&1);
       if(tempRoot->arr[index^1])
       {
            res += (1 << i);
            tempRoot = tempRoot->arr[index^1];
       }else 
       {
            tempRoot = tempRoot->arr[index];
       }
    }
    return res;
}

void deleteTrie(node *root)
{
    for(int i = 0; i < N; i++)
    {
        if(root->arr[i])
        {
            deleteTrie(root->arr[i]);
        }
    }
    delete root;
}

void solve()
{
    node* root = getNode();
    insert(root,0);
    int n;
    cin >> n;
    vector<int> v(n);
    int pxor = 0;
    int mxor = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> v[i];
        pxor ^= v[i];
        mxor = max(mxor,pxor);
        mxor = max(mxor,search(root,pxor));
        insert(root,pxor);
    }
    deleteTrie(root);
    cout << mxor << endl;
}