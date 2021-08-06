//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define long long ll
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
void solve(){ }

int tree[MAX];
int idx;

int min(){ return tree[1]; }
int root(int node){
    return node/2;
}
void insert(int val){
    idx++;
    tree[idx] = val;
    int Rsearch = idx;
    while(Rsearch > 1 && tree[root(Rsearch)] > tree[Rsearch]){
        swap(tree[root(Rsearch)], tree[Rsearch]);
        Rsearch = idx/2;
    }
}
void print() { for(int i = 1; i <=idx; i++) cout << tree[i] << " "; }
void popMin(){
    swap(tree[1], tree[idx]);
    idx--;
    int Lsearch = 1;
    int Rsearch = 1;
    // cout << min() << endl;
    // print();
    while(true){
        if(idx >= Lsearch*2 && tree[Lsearch] > tree[Lsearch*2]){
            // cout << "print : first " << endl;
            swap(tree[Lsearch],tree[Lsearch*2]);
            Lsearch = Lsearch*2;
        }else if(idx >= Rsearch*2+1 && tree[Rsearch] > tree[Rsearch*2+1]){
            // cout << "print : second" << endl;
            swap(tree[Rsearch],tree[Rsearch*2+1]);
            Rsearch = Rsearch*2 + 1;
        }else break;
    }
}


int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    cls

    insert(5);
    insert(2);
    insert(1);
    insert(3);
    // print(); printf("\n");
    popMin();
    cout << min() << endl;
    popMin();
    cout << min() << endl;
    popMin();
    cout << min() << endl;
    // print(); printf("\n");
    
    
}