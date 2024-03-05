#include <bits/stdc++.h>
using namespace std;

int gcd(int x, int y){
    if(y) return gcd(y,x%y);
    else return x;
}

void solve(){
    int n;
    cin >> n;
    int mn = n;
    int arr[n];
    // if(n & 1) mn = n/2 + 1; 
    // else mn = n/2;
    int odd[n]={0};
    deque<int>q;
    int j = 0;
    for(int i = 0; i < n; i++){
        cin >> arr[i];
        if(arr[i] & 1){
            odd[j] = arr[i];
            q.push_back(arr[i]);
            j++;
        } 
        else q.push_front(arr[i]);
    }
    int count = 0;
    for(int i = 1; i <=n; i++){
        if(q.front() % 2 == 0){
            count += n-i;
            q.pop_front();
        } 
    }
    for(int k = 0; k < j-1; k++){
        for(int m = k+1; m < j-1; m++){
            if(gcd(arr[k],arr[m]) > 1) count++;
        }
    }
    cout << count << endl;

    // for(auto x : q) cout << x << " ";
}
int main()
{
    int n;
    cin >> n;
    while(n--){
        solve();
    }
    
    // cout << gcd(6,3);
    
}