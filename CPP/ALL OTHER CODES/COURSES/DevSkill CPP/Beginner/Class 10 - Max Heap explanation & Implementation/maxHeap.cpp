#include <bits/stdc++.h>
using namespace std;

const int N = 1e4+10;
int heap[N];
int sz;
int mxSz;
void print()
{
    for(int i = 1; i <= sz; i++)
    {
        cout << heap[i] << " ";
    }
    printf("\n");
}
int getMax()
{
    return heap[1];
}
int getParent(int node)
{
    return heap[node/2];
}
void insertR(int curIdx)
{
    if(curIdx > 1 && getParent(curIdx) < heap[curIdx])
    {
        swap(heap[curIdx/2],heap[curIdx]);
        curIdx/=2;
        insertR(curIdx);
    }
}
void insert(int value)
{
    sz++;
    mxSz = max(sz,mxSz);
    heap[sz] = value;
    int curIdx = sz;
    insertR(curIdx);
    // while(curIdx > 1 && getParent(curIdx) < heap[curIdx])
    // {
    //     swap(heap[curIdx/2],heap[curIdx]);
    //     curIdx/=2;
    // }
}

void popMax()
{
   
    swap(heap[sz],heap[1]);
    sz--;
    int curIdx = 1;
    while(curIdx <= sz)
    {
        int mx = -10;
        if((curIdx*2)+1 <= sz)
            mx = max(heap[curIdx*2],heap[(curIdx*2)+1]);
        if((curIdx*2) <= sz && heap[curIdx] < heap[curIdx*2] && mx == heap[curIdx*2])
        {
            swap(heap[curIdx],heap[curIdx*2]);
            curIdx *= 2;
        }else if((curIdx*2)+1 <= sz && heap[curIdx] < heap[(curIdx*2)+1] && mx == heap[(curIdx*2)+1])
        {
            swap(heap[curIdx],heap[(curIdx*2)+1]);
            curIdx = (curIdx*2)+1;
        }else break;
    }
    
}

int left(int node)
{
    return node*2;
}
int right(int node)
{
    return (node*2)+1;
}

void popMaxR(int curIdx)
{
    int l = left(curIdx);
    int r = right(curIdx);
    int largest = curIdx;
    int mx = -1;
    if(r <= sz)
        mx = max(heap[l],heap[r]);
    else if(sz == 2 && heap[l] > heap[curIdx]) 
    {
        swap(heap[l],heap[curIdx]);
        return;
    }

    if(l <= sz && heap[l] > heap[curIdx] && mx == heap[l])
    {
        largest = l;
    }else if(r <= sz && heap[r] > heap[curIdx] && mx == heap[r])
    {
        largest = r;
    }
    if(largest != curIdx)
    {
        swap(heap[largest],heap[curIdx]);
        popMaxR(largest);
    }
}
void popIt()
{
    swap(heap[sz],heap[1]);
    sz--;
    popMaxR(1);
}

void printAll()
{
    for(int i = 1; i <= mxSz; i++) cout << heap[i] << " ";
    printf("\n");
}

int main()
{
    // insert(15);
    // insert(10);
    // insert(18);
    // insert(11);
    insert(108);
    insert(11);
    insert(18);
    insert(5);
    insert(6);
    insert(10);
    // popMax();
    // popMax();
    // popMax();
    // popMax();
    // popMax();
    // popMax();
    // print();
    popIt();
    popIt();
    popIt();
    popIt();
    popIt();
    cout << getMax() << endl;
    print();
    printAll();
    
    
    

}