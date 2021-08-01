//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    string n;
    cin >> n;
    int size = n.size();
    int arr[26] = {0};
    int pos = -1;
    for(int i = 0; i < size; i++){
        if(n[i] == 'a') pos = i; 
        arr[n[i]-'a']++;
    }
    sort(arr,arr+26);
    if(arr[25] > 1){
        cout << "NO" << endl;
        return;
    }
    if(pos==-1){
        cout << "NO" << endl;
        return;
    }

    int L = pos-1;
    int R = pos+1;
    while(true){
        if(R == size && L == -1) break;
        if(L != -1 && abs(n[pos] - n[L]) == 1){
            pos = L;
            L = L-1;
            continue;
        }
        if(R != size && abs(n[pos] - n[R]) == 1){
            pos = R;
            R += 1;
            continue;
        }
        cout << "NO" << endl;
        return;
    }

    cout << "YES" << "\n";
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}