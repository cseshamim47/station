#include <bits/stdc++.h>
using namespace std;
#define MIL 1000005
int tree[MIL];
int idx = 0;
int Root(int node){
    return node/2;
}
int Max(){
    return tree[1];
}
void Insert(int n){
    idx++;
    tree[idx] = n;
    int curIdx = idx;
    while(curIdx > 1 && tree[Root(curIdx)] < tree[curIdx]){
        swap(tree[Root(curIdx)], tree[curIdx]);
        curIdx = idx/2;
    }
}
void PopMax(){
    swap(tree[1],tree[idx]);
    idx--;
    int l = 1,r = 1;
    while(true){
        if(l*2 <= idx && tree[l] < tree[l*2]){
            swap(tree[l], tree[l*2]);
            l = l*2;
        }else if(r*2+1 <= idx && tree[r] < tree[r*2+1]){
            swap(tree[r], tree[r*2+1]);
            r = r*2+1;
        }else break;
    }
}

void print(){
    for(int x = 1; x<=4;x++){
        cout << tree[x] << " " ;
    } 
    printf("\n");
}


int main()
{
    Insert(1);
    Insert(3);
    Insert(4);
    Insert(2);
    print();

    // cout << Max() << endl;
    PopMax();
    PopMax();
    PopMax();
    print();
    
}