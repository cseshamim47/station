#include <iostream>
#include <vector>
using namespace std;

int main()
{
    int n;
    cin >> n;
    vector <vector <int> > vec(n, vector<int> (n,0));
    vector <vector <int> > transpose(n, vector<int> (n, 1));

    for(int i = 0; i < n; i++){
        for(int j = 0; j < n; j++){
            cout << transpose[i][j] << " ";
        }
        cout << endl;
    }
}