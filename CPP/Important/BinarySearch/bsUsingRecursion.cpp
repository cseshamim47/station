//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;

int cnt;
vector<int>bs;
bool isF;

void binary_search(int L, int R, int find){
    int M = (L+R)/2;
    if(bs[L] == find){
         cout << find << " is found at " << L << " index" << endl;
         cnt++;
         return;
    }
    if(L>=R) return;

    if(bs[M] < find) return binary_search(M+1,R,find);
    else return binary_search(L,M,find);
}


int main()
{

    int size;
    cout << "Enter array size : ";
    cin >> size;
    cout << "Enter value : ";
    for(int i = 0; i < size; i++){
        int tmp; cin >> tmp;
        bs.push_back(tmp);
    }
    

    int x;
    while(true){
        cout << "Enter value to search : ";
        cin >> x;
        binary_search(0,size-1,x);
        if(!cnt) cout << "Not Found" << endl;
        cnt = 0;
    }

}