#include <bits/stdc++.h>
using namespace std;
#define ll long long
#define mod 1000000007

void solve(){
    int n, x;
    cin >> n >> x;
    if (n%2 == 1 && (n+1)/2 == x){
        cout << -1 << endl;
        return;
    }
    
    int arr[n+1];
    for (int i=1; i<=n; i++){
        arr[i] = i;
    }
    swap(arr[1], arr[x]);
    if (n != x){ 
        swap(arr[n], arr[n-x+1]); // swapping symmetrical element    
    }
    
    for (int i=1; i<=n; i++){
        cout << arr[i] << " ";
    }
    cout << endl;
}

int main() {
	int t;
	cin >> t;
	while (t--){
	    solve();
	}
	return 0;
}