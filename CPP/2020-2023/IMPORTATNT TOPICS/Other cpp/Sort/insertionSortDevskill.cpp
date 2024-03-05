//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
int cnt;

void solve(){}

void insertion_sort(vector<int> &v){
    for(int i = 1; i < v.size(); i++){
        int key = v[i];
        int pivot = i - 1;
        cnt++;
        while(pivot >= 0 && key < v[pivot]){
            v[pivot + 1]  = v[pivot];
            pivot--;
            cnt++;
        }
        v[pivot + 1] = key;
    }
    cout << cnt << endl;
}

int main()
{
      //        Bismillah
     // int t;   cin >> t;   w(t);
    // cls

    vector<int> v;
    int size;
    cin >> size;

    while(size--){
        int x;
        cin >> x;
        v.push_back(x);
    }
    insertion_sort(v);

    for(auto it : v) cout << it << " ";
    


}